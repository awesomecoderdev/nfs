import React, { Component, Fragment, useState, useEffect } from "react";
import { Menu, Transition, Tab, Popover } from "@headlessui/react";
import { ChevronLeftIcon, ChevronRightIcon } from "@heroicons/react/24/solid";

import {
    add,
    startOfDay,
    endOfDay,
    getHours,
    isSameHour,
    eachDayOfInterval,
    eachHourOfInterval,
    endOfMonth,
    format,
    getDay,
    isEqual,
    isSameDay,
    isSameMonth,
    isToday,
    parse,
    parseISO,
    startOfToday,
    startOfWeek,
    endOfWeek,
    startOfMonth,
} from "date-fns";
import axios from "axios";
import { scheduleJson } from "./Data";

const classNames = (...classes) => {
    return classes.filter(Boolean).join(" ");
};

const colStartClasses = [
    "",
    "start-2",
    "start-3",
    "start-4",
    "start-5",
    "start-6",
    "start-7",
];

const Time = () => {
    const startFromNow = startFrom
        ? parse(startFrom, "d-M-yyyy", new Date())
        : startOfToday();
    const today = startFromNow > startOfToday() ? startFromNow : startOfToday();
    const tday = startOfToday();
    const [selectedHour, setSelectedHour] = useState([]);
    const [selectedSchedule, setSelectedSchedule] = useState([]);
    const [currentHour, setCurrentHour] = useState(new Date());
    const [currentDay, setCurrentDay] = useState(today);
    const [startCalendar, setStartCalendar] = useState(today);
    const firstCurrentHour = parse(currentHour, "MMM-yyyy", new Date());

    const days = eachDayOfInterval({
        start: startOfWeek(startOfMonth(startCalendar)),
        end: endOfWeek(endOfMonth(startCalendar)),
    });

    const currentWeek = eachDayOfInterval({
        start: startOfWeek(today),
        end: endOfWeek(today),
    });

    // process got to prev day ->done
    const previousDay = () => {
        const goToPrivDay = add(currentDay, { days: -1 });
        setCurrentDay(goToPrivDay);
    };
    // process got to next day ->done
    const nextDay = () => {
        const goToNextDay = add(currentDay, { days: 1 });
        setCurrentDay(goToNextDay);
    };

    function setSchedule(schedule) {
        if (selectedSchedule.includes(schedule)) {
            selectedSchedule.splice(selectedSchedule.indexOf(schedule), 1); //deleting
            setSelectedSchedule(selectedSchedule);
        } else {
            selectedSchedule.push(schedule);
            setSelectedSchedule(selectedSchedule);
        }
    }

    useEffect(() => {
        console.log("====================================");
        console.log("selectedSchedule", selectedSchedule);
        console.log("====================================");
    }, [selectedSchedule, setSchedule]);

    const processSubmit = () => {
        console.log("====================================");
        console.log(selectedSchedule);
        console.log("====================================");
    };

    const timeTables = [
        // {
        //   title: "Bereitschaftszeit A-Dienst",
        //   group: "a",
        // },
        // {
        //   title: "Bereitschaftszeit B-Dienst",
        //   group: "b",
        // },
        // {
        //   title: "Bereitschaftszeit H-Dienst",
        //   group: "h",
        // },
        {
            title: "A-Dienst",
            group: "a",
        },
        {
            title: "B-Dienst",
            group: "b",
        },
        {
            title: "H-Dienst",
            group: "h",
        },
    ];

    const tabs = [
        {
            id: "menu",
            title: "Menu",
            component: "Menu",
        },
        {
            id: "urlaub",
            title: "Urlaub/Auszeit",
            component: "Urlaub/Auszeit",
        },
        {
            id: "pinnwand",
            title: "Pinnwand",
            component: "Pinnwand",
        },
    ];

    const processNeinAction = () => {
        alert("cancled");
    };

    const processJaAction = () => {
        alert("Submited");
    };

    function previousMonth() {
        console.log("previousMonth");
        const firstDayNextMonth = add(startCalendar, { months: -1 });
        setStartCalendar(firstDayNextMonth);
    }
    function nextMonth() {
        const firstDayNextMonth = add(startCalendar, { months: 1 });
        setStartCalendar(firstDayNextMonth);
    }

    return (
        <Fragment>
            <div className="container">
                <button className={`active week_item`} type="button">
                    Week {format(today, "I")}
                </button>
            </div>

            <div className="timetables">
                {currentWeek.map((day, indexOfDay) => {
                    const hours = eachHourOfInterval({
                        start: startOfDay(day),
                        end: endOfDay(day),
                    });

                    return (
                        <div key={indexOfDay} className="timetable">
                            <div className="hourtables">
                                {timeTables.map((timetable) => (
                                    <div
                                        key={timetable.group}
                                        className={`hourtable ${timetable.group}`}
                                    >
                                        <button className="hour title">
                                            {timetable.group.toUpperCase()}
                                        </button>
                                        {hours.map((hour, hrIndex) => {
                                            return (
                                                <button
                                                    key={hrIndex}
                                                    type="button"
                                                    onClick={(e) => {
                                                        const scheduleKey = `${
                                                            table.group
                                                        }-${format(
                                                            hour,
                                                            "MM-dd-yyyy"
                                                        )}-${getHours(hour)}`;
                                                        setSelectedHour(
                                                            scheduleKey
                                                        );
                                                        setSchedule(
                                                            scheduleKey
                                                        );
                                                    }}
                                                    className={classNames(
                                                        "hour",
                                                        hrIndex == 6 && "space",
                                                        hrIndex == 12 &&
                                                            "space",
                                                        hrIndex == 18 && "space"
                                                    )}
                                                >
                                                    <time
                                                        dateTime={hour}
                                                        className="hr_time"
                                                    >
                                                        {getHours(hour) < 10
                                                            ? "0" +
                                                              getHours(hour) +
                                                              ":00"
                                                            : getHours(hour) +
                                                              ":00"}
                                                    </time>
                                                </button>
                                            );
                                        })}
                                    </div>
                                ))}
                            </div>
                        </div>
                    );
                })}
            </div>
        </Fragment>
    );
};

export default Time;
