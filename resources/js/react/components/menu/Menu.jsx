import { twMerge } from "tailwind-merge";
import Links from "./Links";

export default function Menu({ className = "" }) {
    return (
        <ul
            className={twMerge(
                "flex lg:px-[15px] py-[15px] border-2 border-gris rounded-full",
                className
            )}
        >
            <Links to="/" title="INICIO" />
            <Links to="/#servicios" title="SERVICIOS" />
            <Links to="/#promociones" title="PROMOCIONES" />
            <Links to="/#resultados" title="RESULTADOS" />
            <Links to="/#faqs" title="FAQs" />
            <Links className="border-none" to="/#contacto" title="CONTACTO" />
        </ul>
    );
}
