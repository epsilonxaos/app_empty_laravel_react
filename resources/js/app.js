import "./bootstrap";
// import "laravel-datatables-vite";
import "flowbite";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

import.meta.glob(["../img/**"]);
