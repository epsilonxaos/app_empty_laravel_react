import { twMerge } from "tailwind-merge";
import parse from "html-react-parser";
import { motion, useInView } from "framer-motion";
import { useRef } from "react";

export default function Parrafo({
    className = "",
    children = null,
    textParse = "",
}) {
    const ref = useRef(null);
    const isInView = useInView(ref, { once: true });

    return (
        <motion.p
            ref={ref}
            style={{
                transform: isInView ? "none" : "translateY(-10px)",
                opacity: isInView ? 1 : 0,
                transition: "all 0.9s cubic-bezier(0.17, 0.55, 0.55, 1) 0.35s",
            }}
            className={twMerge(
                "text-left text-lg text-black tracking-[-0.54px] leading-[1.2]",
                className
            )}
        >
            {textParse ? parse(textParse) : children}
        </motion.p>
    );
}
