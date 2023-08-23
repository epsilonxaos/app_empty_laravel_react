import { twMerge } from "tailwind-merge";

export default function Container({ className = "", children, id }) {
    return (
        <section
            {...(id && id)}
            className={twMerge(
                "max-w-7xl px-4 lg:px-[50px] mx-auto",
                className
            )}
        >
            {children}
        </section>
    );
}
