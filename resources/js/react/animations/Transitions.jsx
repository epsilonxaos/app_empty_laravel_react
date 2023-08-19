import { motion } from "framer-motion";

const Transition = ({ children }) => {
    const slideIn = {
        position: "fixed",
        top: 0,
        left: 0,
        width: "100%",
        height: "100vh",
        background: "#0f0f0f",
        transformOrigin: "bottom",
        zIndex: 100,
    };
    const slideOut = {
        position: "fixed",
        top: 0,
        left: 0,
        width: "100%",
        height: "100vh",
        background: "#0f0f0f",
        transformOrigin: "top",
        zIndex: 100,
    };

    return (
        <>
            {children}
            <motion.div
                style={slideIn}
                initial={{ scaleY: 0 }}
                animate={{ scaleY: 0 }}
                exit={{ scaleY: 1 }}
                transition={{ duration: 0.6, ease: [0.22, 1, 0.36, 1] }}
            />
            <motion.div
                style={slideOut}
                initial={{ scaleY: 1 }}
                animate={{ scaleY: 0 }}
                exit={{ scaleY: 0 }}
                transition={{ duration: 0.6, ease: [0.22, 1, 0.36, 1] }}
            />
        </>
    );
};

export default Transition;
