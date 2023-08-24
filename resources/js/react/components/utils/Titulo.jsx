import { motion, useInView } from "framer-motion";
import { useRef } from "react";
import { twMerge } from "tailwind-merge";

export default function Titulo({ className = "", children }) {
    const ref = useRef(null);
    const isInView = useInView(ref, { once: true });

    return (
        <motion.h2
            ref={ref}
            style={{
                transform: isInView ? "none" : "translateX(-50px)",
                opacity: isInView ? 1 : 0,
                transition: "all 0.9s cubic-bezier(0.17, 0.55, 0.55, 1) 0.2s",
            }}
            className={twMerge(
                "text-[28px] md:text-[35px] tracking-[-0.96px] leading-[1.05] font-bold text-center mb-[30px]",
                className
            )}
        >
            {children}
        </motion.h2>
    );
}
