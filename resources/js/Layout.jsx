import { Fragment, useState } from "react";
import Timetable from "./components/Timetable";
import Time from "./components/Time";
import Calendar from "./components/Calendar";

const Layout = () => {
    const [isShowing, setIsShowing] = useState(false);
    return <Fragment>{showTimeTable ? <Time /> : <Calendar />}</Fragment>;
};

export default Layout;
