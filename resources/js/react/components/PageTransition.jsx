import { motion } from "framer-motion";

const PageTransition = ({ children }) => {
    return (
        <>
            <motion.div
                className="fixed top-0 left-0 w-full h-svh bg-white origin-top z-50"
                initial={{ scaleY: 0 }}
                animate={{ scaleY: 0 }}
                exit={{ scaleY: 1 }}
                transition={{ duration: 0.5, ease: [0.22, 1, 0.36, 1] }}
            />
            <motion.div
                className="fixed top-0 left-0 w-full h-svh bg-white origin-bottom z-50"
                initial={{ scaleY: 1 }}
                animate={{ scaleY: 0 }}
                exit={{ scaleY: 0 }}
                transition={{
                    delay: 0.1,
                    duration: 0.6,
                    ease: [0.22, 1, 0.36, 1],
                }}
            />
            {children}
        </>
    );
};

export default PageTransition;
