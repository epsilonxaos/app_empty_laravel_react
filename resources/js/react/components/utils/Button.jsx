import { twMerge } from "tailwind-merge";

export default function Button({
    type = "button",
    className = "",
    children = "",
}) {
    return (
        <button
            {...type}
            className={twMerge(
                "transition-colors bg-white hover:bg-black rounded py-3 px-6 text-black hover:text-white uppercase tracking-wide font-bold text-xs",
                className
            )}
        >
            {children}
        </button>
    );
}
