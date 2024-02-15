<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageNumber = \Illuminate\Support\Facades\Request::get('page', 1); // Récupère le numéro de page actuel depuis la requête
        $perPage = 13; // Nombre d'éléments à afficher par page

        $postsEnCours = post::where('statut', 'En cours')
            ->orderBy('id', 'desc')
            ->paginate($perPage);

        $postsTermines = post::where('statut', 'Terminé')
            ->orderBy('id', 'desc')
            ->paginate($perPage);

        $postsAVoir = post::where('statut', 'A voir')
            ->orderBy('id', 'desc')
            ->paginate($perPage);

        $mergedPosts = $postsEnCours->merge($postsTermines)->merge($postsAVoir);

        $totalItems = $mergedPosts->count();

        $posts = new \Illuminate\Pagination\LengthAwarePaginator(
            $mergedPosts->forPage($pageNumber, $perPage),
            $totalItems,
            $perPage,
            $pageNumber,
            ['path' => \Illuminate\Support\Facades\Request::url()]
        );
        
        $randomPosts = $this->getRandomPosts();

        $MemoriesTermines = post::where('statut', 'Terminé')
            ->where('type', 'Série')
            ->get();
        $CompletedCount = $MemoriesTermines->count();

        $MemoriesEncours = post::where('statut', 'En cours')
            ->where('type', 'Série')
            ->get();
        $ProgressCount = $MemoriesEncours->count();

        $MemoriesAVoir = post::where('statut', 'A voir')
            ->where('type', 'Film')
            ->get();
        $ToSeeCount = $MemoriesAVoir->count();

        return response()->json([
            'postsEnCours' => $postsEnCours,
            'postsTermines' => $postsTermines,
            'postsAVoir' => $postsAVoir,
            'CompletedCount' => $CompletedCount,
            'ProgressCount' => $ProgressCount,
            'ToSeeCount' => $ToSeeCount,
            'RandomEnCours' => $randomPosts['RandomEnCours'],
            'RandomTermine' => $randomPosts['RandomTermine'],
            'RandomAVoir' => $randomPosts['RandomAVoir'],
        ]);
    }

    public function getRandomPosts()
{
    $today = Carbon::now()->startOfDay();

    // Générez une graine de randomisation basée sur la date actuelle
    // Cela garantira que la sélection aléatoire reste cohérente pour chaque jour
    $seed = $today->format('Ymd');

    // Utilisez la graine pour obtenir des postes aléatoires à partir de chaque statut
    $RandomEnCours = Post::where('statut', 'En cours')
        ->inRandomOrder($seed)
        ->first();

    $RandomTermine = Post::where('statut', 'Terminé')
        ->inRandomOrder($seed)
        ->first();

    $RandomAVoir = Post::where('statut', 'A voir')
        ->inRandomOrder($seed)
        ->first();

    return [
        'RandomEnCours' => $RandomEnCours,
        'RandomTermine' => $RandomTermine,
        'RandomAVoir' => $RandomAVoir,
    ];
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->json([
            'message' => 'Create form'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'type' => 'required',
            'statut' => 'required',
            'episode' => 'required',
            'date_ajout' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        try {
            $imageName = Str::random() . '.' . $request->file->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('images/', $request->file, $imageName);

            $postData = [
                'title' => $request->title,
                'type' => $request->type,
                'statut' => $request->statut,
                'episode' => $request->episode,
                'date_ajout' => $request->date_ajout,
                'image' => $imageName
            ];

            post::create($postData);

            return response()->json([
                'message' => 'post Created Successfully!!'
            ]);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json([
                'message' => 'Something goes wrong while creating a post!!'
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($title)
    {
        $post = Post::where('title', $title)->first();

        if ($post) {
            return response()->json([
                'post' => $post,
            ]);
        } else {
            return response()->json([
                'message' => 'Post not found',
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $title)
    {
        $request->validate([
            'title' => 'required',
            'type' => 'required',
            'statut' => 'required',
            'episode' => 'required',
            'date_ajout' => 'required',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048', 
        ]);
    
        try {
            $post = Post::where('title', $title)->first();
    
            if (!$post) {
                return response()->json([
                    'message' => 'Memorie non trouvé'
                ], 404);
            }
    
            // Mettez à jour les attributs du post avec les nouvelles valeurs
            $post->title = $request->input('title');
            $post->type = $request->input('type');
            $post->statut = $request->input('statut');
            $post->episode = $request->input('episode');
            $post->date_ajout = $request->input('date_ajout');
    
            // Vérifiez si une nouvelle image est téléchargée et mettez à jour si nécessaire
            if ($request->hasFile('image')) {
                // Supprimer l'ancienne image
                if ($post->image) {
                    $exists = Storage::disk('public')->exists("images/{$post->image}");
                    if ($exists) {
                        Storage::disk('public')->delete("images/{$post->image}");
                    }
                }
    
                $imageName = Str::random() . '.' . $request->image->getClientOriginalExtension();
                Storage::disk('public')->putFileAs('images/', $request->image, $imageName);
                $post->image = $imageName;
            }
    
            // Enregistrez les modifications dans la base de données
            $post->save();
    
            return response()->json([
                'message' => 'Memomrie mis à jour avec succès!!'
            ]);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json([
                'message' => 'Quelque chose ne va pas lors de la mise à jour d"un memorie.'
            ], 500);
        }
    }
    


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        try {
            if ($post->image) {
                Storage::disk('public')->delete("images/{$post->image}");
            }

            $post->delete();

            return response()->json([
                'message' => 'Memorie supprimée avec succès!!'
            ]);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json([
                'message' => 'Une erreur s"est produite durant la suppression de la memorie!!'
            ], 500);
        }
    }

    public function search($title)
    {
        if (empty($title)) {
            return response()->json([]);
        }
    
        $searchResults = Post::where('title', 'like', "%{$title}%")->get();
        return response()->json($searchResults);
    }
    
}
