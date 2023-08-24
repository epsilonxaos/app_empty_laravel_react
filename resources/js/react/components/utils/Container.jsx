import { twMerge } from "tailwind-merge";

export default function Container({
    className = "",
    classNameSection = "",
    children,
    intoSection,
    id,
}) {
    return (
        <section {...(id && id)} className={classNameSection}>
            {intoSection}
            <div
                className={twMerge(
                    "max-w-7xl px-4 lg:px-[50px] mx-auto md:py-[90px] lg:py-[120px]",
                    className
                )}
            >
                {children}
            </div>
        </section>
    );
}
