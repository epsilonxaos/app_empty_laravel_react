import { useState } from "react";
import Container from "./utils/Container";
import Menu from "./menu/Menu";

import "../../../css/web/header.css";
import { LOGO } from "../icons/icons";

export default function Header() {
    const [open, setOpen] = useState(false);

    return (
        <header className="py-[12px] w-full fixed z-50 top-0 left-0">
            <Container className="!py-0">
                <div className="flex w-full justify-between items-center">
                    <div className="logo">
                        <LOGO />
                    </div>

                    <nav className="hidden md:block">
                        <Menu />
                    </nav>

                    <div className="md:hidden pt-[6px]">
                        <div
                            className={`menu menu-3 ${open ? "active" : ""}`}
                            onClick={() => {
                                setOpen(!open);
                            }}
                        >
                            <span></span>
                        </div>
                    </div>
                </div>
            </Container>
        </header>
    );
}
