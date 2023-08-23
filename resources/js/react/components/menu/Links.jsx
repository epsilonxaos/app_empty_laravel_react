import { NavLink } from "react-router-dom";
import { twMerge } from "tailwind-merge";

export default function Links({ className = "", to = "/", title = "" }) {
    return (
        <li
            className={twMerge(
                "px-[15px] text-xs lg:text-base xl:text-lg font-semibold font-ibmPlex border-r-2 border-r-gris",
                className
            )}
        >
            <NavLink to={to}>{title}</NavLink>
        </li>
    );
}
