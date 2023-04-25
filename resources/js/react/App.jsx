import { createRoot } from "react-dom/client";
import "../../css/index.css";

export default function Test() {
    return (
        <div className="bg-gray-400">
            <h1>How To Install React in Laravel 12 with Vite</h1>
        </div>
    );
}
let container = null;
document.addEventListener("DOMContentLoaded", function (event) {
    if (!container) {
        container = document.getElementById("root1");
        const root = createRoot(container);
        root.render(<Test />);
    }
});
