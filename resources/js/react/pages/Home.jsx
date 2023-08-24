import Faqs from "./home/Faqs";
import Inicio from "./home/Inicio";
import Servicios from "./home/Servicios";

export default function Home() {
    return (
        <main>
            <Inicio />
            <Servicios />
            <Faqs />
        </main>
    );
}
