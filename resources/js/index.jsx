import React, { Fragment } from "react";
import ReactDOM from "react-dom/client";
import Time from "./components/Time";
import Layout from "./Layout";

if (document.getElementById("timeTableDates") != null) {
    const root = ReactDOM.createRoot(document.getElementById("timeTableDates"));
    root.render(
        <>
            <Layout />
        </>
    );
}
