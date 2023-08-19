import AppContext from "../context/AppContext";
import { useContext } from "react";

export default function Footer() {
    const { state } = useContext(AppContext);

    return (
        <footer
            className="bg-black py-[50px] lg:pb-[40px] lg:pt-[130px] text-white"
            id="footer"
        >
            Footer
        </footer>
    );
}
