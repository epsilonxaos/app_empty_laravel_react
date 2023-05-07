import React from "react";
import { createRoot } from "react-dom/client";
import "../../css/app.css";

export default function Test() {
    return (
        <div className="bg-gray-400">
            <a href="https://admin-local.mx/login">Panel Administrativo</a>
                {/* <button className="py-2 px-3 bg-emerald-900 text-red-500">Panel Administrativo</button> */}
            <h1>How To Install React in Laravel 12 with Vite</h1>
        </div>
    );
}
let container = null;
document.addEventListener("DOMContentLoaded", function (event) {
    if (!container) {
        container = document.getElementById("root");
        const root = createRoot(container);
        root.render(<Test />);
    }
});
