import { Route, Routes, useLocation } from "react-router-dom";
import { useEffect, useReducer } from "react";
import { AnimatePresence } from "framer-motion";
import { Toaster } from "sonner";
import ScrollToTop from "./components/scrollToTop/ScrollToTop";
import Transition from "./animations/Transitions";
import AppContext from "./context/AppContext";

import Footer from "./components/Footer";
import Header from "./components/Header";
import Home from "./pages/Home";

export default function Web() {
    const location = useLocation();
    const reducer = (prev, next) => ({ ...prev, ...next });
    const initialArgs = { loading: true };
    const [state, dispatch] = useReducer(reducer, initialArgs);

    useEffect(() => {
        setTimeout(() => {
            dispatch({ loading: false });
        }, 1500);
    }, []);

    if (state.loading)
        return (
            <div className="h-screen w-full bg-black text-white flex items-center justify-center">
                Cargando...
            </div>
        );

    return (
        <div className="min-h-screen md:pt-[67px] font-archivoExpanded">
            <Toaster richColors={true} />
            <AppContext.Provider value={{ state, dispatch }}>
                <Header />
                <AnimatePresence mode="wait">
                    <ScrollToTop />
                    <Routes location={location} key={location.pathname}>
                        <Route
                            index
                            element={
                                <Transition>
                                    <Home />
                                </Transition>
                            }
                        />
                    </Routes>
                </AnimatePresence>
                <Footer />
            </AppContext.Provider>
        </div>
    );
}
