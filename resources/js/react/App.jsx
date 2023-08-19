import React from "react";
import { createRoot } from "react-dom/client";

import Web from "./Web";
import { BrowserRouter, Route, Routes } from "react-router-dom";

const root = createRoot(document.getElementById("root"));
root.render(
    <BrowserRouter>
        <Routes>
            <Route path="/*" element={<Web />} />
        </Routes>
    </BrowserRouter>
);
