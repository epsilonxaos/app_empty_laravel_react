import { useReducer } from "react";
import { AnimatePresence } from "framer-motion";

import ScrollToTop from "./components/ScrollToTop";
import PageTransition from "./components/PageTransition";
import Loading from "./components/Loading";
import Header from "./components/Header";
import Footer from "./components/Footer";
import Home from "./pages/Home";
import PageNotFound from "./pages/PageNotFound";

const initialArgs = {
    loading: true,
};

const reducer = (prev, next) => ({ ...prev, ...next });

export default function App() {
    const location = useLocation();
    const [state, dispatch] = useReducer(reducer, initialArgs);

    if (state.loading) return <Loading />;

    return (
        <>
            <Header />
            <AnimatePresence mode="wait">
                <ScrollToTop />

                <Routes location={location} key={location.pathname}>
                    <Route
                        index
                        element={
                            <PageTransition>
                                <Home />
                            </PageTransition>
                        }
                    />

                    <Route path="*" element={<PageNotFound />} />
                </Routes>
            </AnimatePresence>
            <Footer />
        </>
    );
}
