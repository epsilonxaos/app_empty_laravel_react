// TypewriterEffect.js

import React, { useEffect, useState } from "react";
import { motion, useAnimation } from "framer-motion";

const TypewriterEffect = ({ message }) => {
    const controls = useAnimation();
    const [text, setText] = useState("");
    const [showCursor, setShowCursor] = useState(true);

    useEffect(() => {
        const writeText = async () => {
            for (let i = 0; i <= message.length; i++) {
                setText(message.substr(0, i));
                await controls.start({
                    opacity: 1,
                    transition: { duration: 0.01 },
                });
                await controls.start({
                    opacity: 1,
                    transition: { duration: 0.01 },
                });
            }
            setShowCursor(true); // Mostrar cursor al terminar
        };
        writeText();
    }, []);

    // Controlar la animación del cursor
    useEffect(() => {
        const interval = setInterval(() => {
            setShowCursor((prev) => !prev);
        }, 500); // Intervalo del cursor (puedes ajustar la velocidad aquí)

        return () => clearInterval(interval);
    }, []);

    return (
        <span className="text-4xl font-mono">
            <motion.span animate={controls} style={{ opacity: 1 }}>
                {text}
            </motion.span>
            {showCursor && (
                <motion.span
                    animate={{ opacity: 1 }}
                    transition={{ yoyo: Infinity, duration: 0.5 }}
                    className="text-blue-500"
                >
                    |
                </motion.span>
            )}
        </span>
    );
};

export default function PageNotFound() {
    return (
        <div className="h-svh w-full bg-white text-black flex items-center justify-center ">
            <div className="text-center mx-auto max-w-max">
                <span className="block w-full">
                    <TypewriterEffect message={"404 Pagina no encontrada"} />
                </span>
                <br />
                <button type="button">Ir al inicio</button>
            </div>
        </div>
    );
}
