import { useEffect } from "react";
import { useLocation } from "react-router-dom";

const ScrollToTop = () => {
    const location = useLocation();

    useEffect(() => {
        const element = location.hash
            ? document.getElementById(location.hash.replace("#", ""))
            : null;

        setTimeout(() => {
            window.scrollTo({
                behavior: element ? "smooth" : "auto",
                top: element ? element.offsetTop - 120 : 0,
            });
        }, 100);
    }, [location]);

    return null;
};

export default ScrollToTop;
