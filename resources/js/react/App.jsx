import { createRoot } from "react-dom/client";

export default function Test() {
    return <h1>How To Install React in Laravel 10 with Vite</h1>;
}

if (document.getElementById("root")) {
    createRoot(document.getElementById("root")).render(<Test />);
}
