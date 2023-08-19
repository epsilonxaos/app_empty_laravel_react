import React, { useRef } from "react";
import { motion, useInView } from "framer-motion";
import { twMerge } from "tailwind-merge";

const AnimatedTextWord = ({ text, className = "" }) => {
    const words = text.split(" ");
    const ref = useRef(null);
    const isInView = useInView(ref, { once: true });

    const container = {
        hidden: { opacity: 0 },
        visible: !isInView
            ? { opacity: 0 }
            : (i = 1) => ({
                  opacity: 1,
                  transition: {
                      delay: 0.3,
                      staggerChildren: 0.12,
                      delayChildren: 0.34 * i,
                  },
              }),
    };

    const child = {
        visible: !isInView
            ? { opacity: 0 }
            : {
                  opacity: 1,
                  x: 0,
                  transition: {
                      type: "spring",
                      damping: 12,
                      stiffness: 100,
                  },
              },
        hidden: !isInView
            ? { opacity: 0 }
            : {
                  opacity: 0,
                  x: 20,
                  transition: {
                      type: "spring",
                      damping: 12,
                      stiffness: 100,
                  },
              },
    };

    return (
        <motion.h2
            ref={ref}
            style={{ overflow: "hidden" }}
            variants={container}
            initial="hidden"
            animate="visible"
            className={twMerge(
                "text-[32px] md:text-[40px] tracking-[-0.96px] leading-[1.05] font-medium text-center mb-[30px] flex flex-wrap w-full",
                className
            )}
        >
            {words.map((word, index) => (
                <motion.span
                    variants={child}
                    style={{ marginRight: "8px" }}
                    key={index}
                >
                    {word}
                </motion.span>
            ))}
        </motion.h2>
    );
};

export default AnimatedTextWord;
