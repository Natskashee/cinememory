import React from "react";
import { Link } from "react-router-dom";

function Logo() {
  return (
    <Link to={"/"} className="text-white flex items-center">
      <span>
        <svg className="h-12" viewBox="0 0 400 240" version="1.1">
          <defs></defs>
          <g
            id="letterboxd-logo-v-neg-rgb"
            stroke="none"
            stroke-width="1"
            fill="none"
            fill-rule="evenodd"
          >
            <g id="Vertical-Lockup" transform="translate(60.000000, 46.000000)">
              <g id="Dots" transform="translate(58.000000, 0.000000)">
                <ellipse
                  id="Blue"
                  fill="#40BCF4"
                  cx="213.426966"
                  cy="48.5"
                  rx="48.5730337"
                  ry="48.5"
                ></ellipse>
                <ellipse
                  id="Green"
                  fill="#00E054"
                  cx="131"
                  cy="48.5"
                  rx="48.5730337"
                  ry="48.5"
                ></ellipse>
                <ellipse
                  id="Orange"
                  fill="#FF8000"
                  cx="48.5730337"
                  cy="48.5"
                  rx="48.5730337"
                  ry="48.5"
                ></ellipse>
                <path
                  d="M89.7865169,74.179439 C85.1226166,66.7324866 82.4269663,57.9305714 82.4269663,48.5 C82.4269663,39.0694286 85.1226166,30.2675134 89.7865169,22.820561 C94.4504171,30.2675134 97.1460674,39.0694286 97.1460674,48.5 C97.1460674,57.9305714 94.4504171,66.7324866 89.7865169,74.179439 Z"
                  id="Overlap"
                  fill="#FFFFFF"
                ></path>
                <path
                  d="M172.213483,22.820561 C176.877383,30.2675134 179.573034,39.0694286 179.573034,48.5 C179.573034,57.9305714 176.877383,66.7324866 172.213483,74.179439 C167.549583,66.7324866 164.853933,57.9305714 164.853933,48.5 C164.853933,39.0694286 167.549583,30.2675134 172.213483,22.820561 Z"
                  id="Overlap"
                  fill="#FFFFFF"
                ></path>
              </g>
            </g>
          </g>
        </svg>
      </span>
    </Link>
  );
}

export default Logo;
