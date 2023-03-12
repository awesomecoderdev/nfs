import React, { Component, Fragment, useState, useEffect } from "react";
import { Menu, Transition, Tab, Popover } from "@headlessui/react";
import { ChevronLeftIcon, ChevronRightIcon } from "@heroicons/react/24/solid";
import { de } from "date-fns/locale";

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
    formatRelative,
    subDays,
} from "date-fns";
import axios from "axios";
import { scheduleJson } from "./Data";
import Popup from "./Popup";

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
    const [wid, setWid] = useState(request.wid ?? 439);
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
    const [groupA, setGroupA] = useState([]);
    const [groupB, setGroupB] = useState([]);
    const [groupH, setGroupH] = useState([]);
    const [groupD, setGroupD] = useState([]);
    const [firstSelect, setFirstSelect] = useState(null);
    const [endSelect, setEndSelect] = useState(null);
    const [selectedTheGroup, setSelectedTheGroup] = useState("");

    const [showPopup, setShowPopup] = useState(true);
    const handleClose = () => {
        setShowPopup(true);
    };
    const without440 = [
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
    const with440 = [
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
        {
            title: "D-Dienst",
            group: "d",
        },
    ];
    const timeTables = wid == 440 ? with440 : without440;
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
        console.log("selectedSchedule", selectedSchedule);
    }, [selectedSchedule, setSchedule]);

    function previousMonth() {
        console.log("previousMonth");
        const firstDayNextMonth = add(startCalendar, { months: -1 });
        setStartCalendar(firstDayNextMonth);
    }
    function nextMonth() {
        const firstDayNextMonth = add(startCalendar, { months: 1 });
        setStartCalendar(firstDayNextMonth);
    }

    const selectByGroup = (scheduleKey, group) => {
        if (group == "a") {
            setGroupA((prevState) =>
                groupA.includes(scheduleKey)
                    ? groupA.filter((i) => i !== scheduleKey)
                    : [...prevState, scheduleKey]
            );
        } else if (group == "b") {
            setGroupB((prevState) =>
                groupB.includes(scheduleKey)
                    ? groupB.filter((i) => i !== scheduleKey)
                    : [...prevState, scheduleKey]
            );
        } else if (group == "d") {
            setGroupD((prevState) =>
                groupD.includes(scheduleKey)
                    ? groupD.filter((i) => i !== scheduleKey)
                    : [...prevState, scheduleKey]
            );
        } else if (group == "h") {
            setGroupH((prevState) =>
                groupH.includes(scheduleKey)
                    ? groupH.filter((i) => i !== scheduleKey)
                    : [...prevState, scheduleKey]
            );
        }
        setSchedule(scheduleKey);
    };

    {
        /* <div className="selectedgroup">
            {groupA
                .sort((a, b) => {
                    const aLast4 = parseInt(a.substr(-4));
                    const bLast4 = parseInt(b.substr(-4));
                    if (aLast4 < bLast4) {
                        return -1;
                    } else if (aLast4 > bLast4) {
                        return 1;
                    } else {
                        return 0;
                    }
                })
                .map((item) => {
                    return <p>{item}</p>;
                })}
        </div> */
    }

    return (
        <Fragment>
            <div className="timeheadings">
                <div className="timeheading leftcontents">
                    <div className="headingcontent">
                        <div className="left">
                            <p className="wid">WID</p>
                            <select
                                name="wid"
                                id="wid"
                                onChange={(e) => {
                                    window.location.href =
                                        widroute + e.target.value;
                                }}
                                defaultValue={wid}
                            >
                                <option value="439">439</option>
                                <option value="440">440</option>
                                <option value="441">441</option>
                                <option value="442">442</option>
                                <option value="443">443</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div className="timeheading centercontents">
                    <p className="centerdate">
                        {format(startOfWeek(today), "d.MMM", {
                            locale: de,
                        }) +
                            "-" +
                            format(endOfWeek(today), "d.MMM", {
                                locale: de,
                            })}
                    </p>
                    <div className="centercalendar">
                        <div className="week_container">
                            <Popover className="pos_relative">
                                {({ open }) => (
                                    <>
                                        <Popover.Button
                                            className={`calendarbtn`}
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="18"
                                                height="18"
                                                viewBox="0 0 24 24"
                                            >
                                                <path d="M21 20V6c0-1.103-.897-2-2-2h-2V2h-2v2H9V2H7v2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2zM9 18H7v-2h2v2zm0-4H7v-2h2v2zm4 4h-2v-2h2v2zm0-4h-2v-2h2v2zm4 4h-2v-2h2v2zm0-4h-2v-2h2v2zm2-5H5V7h14v2z"></path>
                                            </svg>
                                        </Popover.Button>
                                        <Popover.Panel className="popup_calendar">
                                            <div className="calendar_popup_item">
                                                <div className="popup_calendar_card">
                                                    <div className="calendar_inner">
                                                        <div className="calendar_relative">
                                                            <div className="calendar_header">
                                                                <button
                                                                    type="button"
                                                                    onClick={
                                                                        previousMonth
                                                                    }
                                                                    className="calendar_next_prev_btn"
                                                                >
                                                                    <ChevronLeftIcon
                                                                        className="next_prev_icon"
                                                                        aria-hidden="true"
                                                                    />
                                                                </button>

                                                                <span className="calendar_h2 tac">
                                                                    {format(
                                                                        startCalendar,
                                                                        "MMMM yyyy",
                                                                        {
                                                                            locale: de,
                                                                        }
                                                                    )}
                                                                </span>
                                                                <button
                                                                    onClick={
                                                                        nextMonth
                                                                    }
                                                                    type="button"
                                                                    className="calendar_next_prev_btn"
                                                                >
                                                                    <ChevronRightIcon
                                                                        className="next_prev_icon"
                                                                        aria-hidden="true"
                                                                    />
                                                                </button>
                                                            </div>

                                                            <div className="calendar_week_names">
                                                                <div>S</div>
                                                                <div>M</div>
                                                                <div>T</div>
                                                                <div>W</div>
                                                                <div>T</div>
                                                                <div>F</div>
                                                                <div>S</div>
                                                            </div>
                                                            <div className="calendar_date_list">
                                                                {days.map(
                                                                    (
                                                                        day,
                                                                        dayIdx
                                                                    ) => (
                                                                        <div
                                                                            key={day.toString()}
                                                                            className={classNames(
                                                                                dayIdx ===
                                                                                    0 &&
                                                                                    colStartClasses[
                                                                                        getDay(
                                                                                            day
                                                                                        )
                                                                                    ],
                                                                                "padding_y"
                                                                            )}
                                                                        >
                                                                            <button
                                                                                type="button"
                                                                                onClick={() => {
                                                                                    const date =
                                                                                        format(
                                                                                            day,
                                                                                            "d-MM-yyyy"
                                                                                        );
                                                                                    const redirect = `${
                                                                                        window
                                                                                            .location
                                                                                            .origin
                                                                                    }${
                                                                                        window
                                                                                            .location
                                                                                            .pathname
                                                                                    }?start=${date}${
                                                                                        request.wid
                                                                                            ? "&wid=" +
                                                                                              request.wid
                                                                                            : ""
                                                                                    }`;
                                                                                    window.location =
                                                                                        redirect;
                                                                                }}
                                                                                className={classNames(
                                                                                    "calender_default_btn", // default class
                                                                                    isEqual(
                                                                                        day,
                                                                                        today
                                                                                    ) &&
                                                                                        "current_date_btn", // set current date color
                                                                                    tday >
                                                                                        day &&
                                                                                        "previous_next_month_btn", // disable previous date to select
                                                                                    !isSameMonth(
                                                                                        day,
                                                                                        today
                                                                                    ) &&
                                                                                        !(
                                                                                            tday >
                                                                                            day
                                                                                        ) &&
                                                                                        "not_same_month" // set different month date color
                                                                                )}
                                                                            >
                                                                                <time
                                                                                    dateTime={format(
                                                                                        day,
                                                                                        "yyyy-MM-dd"
                                                                                    )}
                                                                                >
                                                                                    {format(
                                                                                        day,
                                                                                        "d"
                                                                                    )}
                                                                                </time>
                                                                            </button>
                                                                        </div>
                                                                    )
                                                                )}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </Popover.Panel>
                                    </>
                                )}
                            </Popover>
                        </div>
                    </div>
                </div>
                <div className="timeheading rightcontentss"></div>
            </div>

            {!showPopup && (
                <Popup title="Bereitschaftszeit anlegen" onClose={handleClose}>
                    <div className="thepopcontainer">
                        <form className="timetableform" action="" method="get">
                            <div>
                                <b>Tag:</b> adfd
                            </div>
                            <div>
                                <b>Start: </b>{" "}
                                {getHours(firstSelect) < 10
                                    ? "0" + getHours(firstSelect) + ":00"
                                    : getHours(firstSelect) + ":00"}
                            </div>
                            <div>
                                <b>Dauer:</b> 1 Stunden
                            </div>
                            <div>
                                <b>Mitarbeiter:</b>
                            </div>
                            <select name="user" id="user">
                                {Object.keys(users)?.map((id) => {
                                    const user = users[id];
                                    return (
                                        <option key={id} value={id}>
                                            {user}
                                        </option>
                                    );
                                })}
                            </select>
                            <div className="flexbtn">
                                <input
                                    type="hidden"
                                    name="_token"
                                    value={token}
                                />
                                <button onClick={(e) => e.preventDefault()}>
                                    Ja
                                </button>
                                <button
                                    type="submit"
                                    onClick={(e) => setShowPopup(true)}
                                >
                                    Nein
                                </button>
                            </div>
                        </form>
                    </div>
                </Popup>
            )}

            <div className="timetables">
                {breackdown && breackdown !== "sm" ? (
                    <Fragment>
                        {currentWeek.map((day, indexOfDay) => {
                            const hours = eachHourOfInterval({
                                start: startOfDay(day),
                                end: endOfDay(day),
                            });

                            return (
                                <div
                                    key={format(day, "d.MM yyyy")}
                                    className="timetable"
                                >
                                    <div className="date format">
                                        <time>{format(day, "d.MM yyyy")}</time>
                                    </div>
                                    <div className="hourtables">
                                        {timeTables.map((timetable) => (
                                            <div
                                                key={timetable.group.toUpperCase()}
                                                className={`hourtable ${timetable.group}`}
                                            >
                                                <button className="hour title">
                                                    {timetable.group.toUpperCase()}
                                                </button>
                                                {hours.map((hour, hrIndex) => {
                                                    return (
                                                        <button
                                                            key={
                                                                hrIndex +
                                                                timetable.group
                                                            }
                                                            type="button"
                                                            onClick={(e) => {
                                                                const scheduleKey = `${format(
                                                                    hour,
                                                                    "MM-dd-yyyy"
                                                                )} ${getHours(
                                                                    hour
                                                                )}:00`;

                                                                if (
                                                                    !firstSelect
                                                                ) {
                                                                    setFirstSelect(
                                                                        hour
                                                                    );
                                                                    setSelectedTheGroup(
                                                                        timetable.group
                                                                    );
                                                                } else {
                                                                    setEndSelect(
                                                                        hour
                                                                    );

                                                                    // console.log(
                                                                    //     "firstSelect",
                                                                    //     firstSelect,
                                                                    //     endSelect
                                                                    // );
                                                                }

                                                                if (
                                                                    firstSelect
                                                                ) {
                                                                    const selectedHours =
                                                                        eachHourOfInterval(
                                                                            {
                                                                                start: firstSelect,
                                                                                end: hour,
                                                                            }
                                                                        );

                                                                    const selectedArr =
                                                                        selectedHours?.map(
                                                                            (
                                                                                item
                                                                            ) =>
                                                                                `${format(
                                                                                    item,
                                                                                    "MM-dd-yyyy"
                                                                                )} ${getHours(
                                                                                    item
                                                                                )}:00`
                                                                        );

                                                                    setSelectedSchedule(
                                                                        selectedArr
                                                                    );

                                                                    console.log(
                                                                        "selectedArr",
                                                                        selectedArr
                                                                    );

                                                                    if (
                                                                        timetable.group ==
                                                                        "a"
                                                                    ) {
                                                                        setGroupA(
                                                                            selectedArr
                                                                        );
                                                                    } else if (
                                                                        timetable.group ==
                                                                        "b"
                                                                    ) {
                                                                        setGroupB(
                                                                            selectedArr
                                                                        );
                                                                    } else if (
                                                                        timetable.group ==
                                                                        "d"
                                                                    ) {
                                                                        setGroupD(
                                                                            selectedArr
                                                                        );
                                                                    } else if (
                                                                        timetable.group ==
                                                                        "h"
                                                                    ) {
                                                                        setGroupH(
                                                                            selectedArr
                                                                        );
                                                                    }
                                                                    setShowPopup(
                                                                        false
                                                                    );
                                                                } else {
                                                                    selectByGroup(
                                                                        scheduleKey,
                                                                        timetable.group
                                                                    );
                                                                }
                                                            }}
                                                            className={classNames(
                                                                `hour`,
                                                                groupA.includes(
                                                                    `${format(
                                                                        hour,
                                                                        "MM-dd-yyyy"
                                                                    )} ${getHours(
                                                                        hour
                                                                    )}:00`
                                                                ) &&
                                                                    `${
                                                                        timetable.group ==
                                                                        "a"
                                                                            ? "a selected"
                                                                            : "selected"
                                                                    }`,
                                                                groupB.includes(
                                                                    `${format(
                                                                        hour,
                                                                        "MM-dd-yyyy"
                                                                    )} ${getHours(
                                                                        hour
                                                                    )}:00`
                                                                ) &&
                                                                    `${
                                                                        timetable.group ==
                                                                        "b"
                                                                            ? "b selected"
                                                                            : "selected"
                                                                    }`,
                                                                groupD.includes(
                                                                    `${format(
                                                                        hour,
                                                                        "MM-dd-yyyy"
                                                                    )} ${getHours(
                                                                        hour
                                                                    )}:00`
                                                                ) &&
                                                                    `${
                                                                        timetable.group ==
                                                                        "d"
                                                                            ? "d selected"
                                                                            : "selected"
                                                                    }`,
                                                                groupH.includes(
                                                                    `${format(
                                                                        hour,
                                                                        "MM-dd-yyyy"
                                                                    )} ${getHours(
                                                                        hour
                                                                    )}:00`
                                                                ) &&
                                                                    `${
                                                                        timetable.group ==
                                                                        "h"
                                                                            ? "h selected"
                                                                            : "selected"
                                                                    }`,
                                                                [
                                                                    6, 12, 18,
                                                                ].includes(
                                                                    hrIndex
                                                                ) && "space",
                                                                // selectedSchedule.length !=
                                                                //     0 &&
                                                                // format(
                                                                //     day,
                                                                //     "MM-dd-yyyy"
                                                                // ) !=
                                                                //     selectedSchedule[0].substr(
                                                                //         0,
                                                                //         10
                                                                //     )
                                                                // ? "sameday"
                                                                // : "diffday",
                                                                // selectedTheGroup !=
                                                                //     "" &&
                                                                //     selectedTheGroup ==
                                                                //         timetable.group
                                                                //     ? `${selectedTheGroup} selected`
                                                                //     : `${timetable.group} selected`
                                                                firstSelect &&
                                                                    format(
                                                                        firstSelect,
                                                                        "MM-dd-yyyy"
                                                                    ) ==
                                                                        format(
                                                                            day,
                                                                            "MM-dd-yyyy"
                                                                        ) &&
                                                                    "sameday",
                                                                firstSelect &&
                                                                    format(
                                                                        firstSelect,
                                                                        "MM-dd-yyyy"
                                                                    ) !=
                                                                        format(
                                                                            day,
                                                                            "MM-dd-yyyy"
                                                                        ) &&
                                                                    "diffday",
                                                                selectedTheGroup !=
                                                                    "" &&
                                                                    selectedTheGroup ==
                                                                        timetable.group &&
                                                                    "samegroup",
                                                                selectedTheGroup !=
                                                                    "" &&
                                                                    selectedTheGroup !=
                                                                        timetable.group &&
                                                                    "diffgroup"
                                                            )}
                                                        >
                                                            <time
                                                                dateTime={hour}
                                                                className="hr_time"
                                                            >
                                                                {getHours(
                                                                    hour
                                                                ) < 10
                                                                    ? "0" +
                                                                      getHours(
                                                                          hour
                                                                      ) +
                                                                      ":00"
                                                                    : getHours(
                                                                          hour
                                                                      ) + ":00"}
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
                    </Fragment>
                ) : (
                    <Fragment>
                        {(() => {
                            const hours = eachHourOfInterval({
                                start: startOfDay(currentDay),
                                end: endOfDay(currentDay),
                            });

                            return (
                                <div className="timetable">
                                    <div className="date format mobile">
                                        <button
                                            type="button"
                                            className="calendar_next_prev_btn"
                                            onClick={(e) => {
                                                const date = format(
                                                    add(currentDay, {
                                                        days: -1,
                                                    }),
                                                    "d-MM-yyyy"
                                                );
                                                const redirect = `${window.location.origin}${window.location.pathname}?start=${date}`;
                                                window.location = redirect;
                                            }}
                                        >
                                            <ChevronLeftIcon
                                                className="next_prev_icon"
                                                aria-hidden="true"
                                            />
                                        </button>
                                        <time>
                                            {format(currentDay, "d.MM yyyy")}
                                        </time>
                                        <button
                                            type="button"
                                            className="calendar_next_prev_btn"
                                            onClick={(e) => {
                                                const date = format(
                                                    add(currentDay, {
                                                        days: 1,
                                                    }),
                                                    "d-MM-yyyy"
                                                );
                                                const redirect = `${window.location.origin}${window.location.pathname}?start=${date}`;
                                                window.location = redirect;
                                            }}
                                        >
                                            <ChevronRightIcon
                                                className="next_prev_icon"
                                                aria-hidden="true"
                                            />
                                        </button>
                                    </div>
                                    <div className="hourtables">
                                        {timeTables.map((timetable) => (
                                            <div
                                                key={timetable.group.toUpperCase()}
                                                className={`hourtable ${timetable.group}`}
                                            >
                                                <button className="hour title">
                                                    {timetable.group.toUpperCase()}
                                                </button>
                                                {hours.map((hour, hrIndex) => {
                                                    return (
                                                        <button
                                                            key={
                                                                hrIndex +
                                                                timetable.group
                                                            }
                                                            type="button"
                                                            onClick={(e) => {
                                                                const scheduleKey = `${format(
                                                                    hour,
                                                                    "MM-dd-yyyy"
                                                                )} ${getHours(
                                                                    hour
                                                                )}:00`;

                                                                selectByGroup(
                                                                    scheduleKey,
                                                                    timetable.group
                                                                );

                                                                if (
                                                                    selectedSchedule.length !=
                                                                    0
                                                                ) {
                                                                    setShowPopup(
                                                                        false
                                                                    );
                                                                }
                                                            }}
                                                            className={classNames(
                                                                `hour`,
                                                                groupA.includes(
                                                                    `${format(
                                                                        hour,
                                                                        "MM-dd-yyyy"
                                                                    )} ${getHours(
                                                                        hour
                                                                    )}:00`
                                                                ) &&
                                                                    `${
                                                                        timetable.group ==
                                                                        "a"
                                                                            ? "a selected"
                                                                            : "selected"
                                                                    }`,
                                                                groupB.includes(
                                                                    `${format(
                                                                        hour,
                                                                        "MM-dd-yyyy"
                                                                    )} ${getHours(
                                                                        hour
                                                                    )}:00`
                                                                ) &&
                                                                    `${
                                                                        timetable.group ==
                                                                        "b"
                                                                            ? "b selected"
                                                                            : "selected"
                                                                    }`,
                                                                groupD.includes(
                                                                    `${format(
                                                                        hour,
                                                                        "MM-dd-yyyy"
                                                                    )} ${getHours(
                                                                        hour
                                                                    )}:00`
                                                                ) &&
                                                                    `${
                                                                        timetable.group ==
                                                                        "d"
                                                                            ? "d selected"
                                                                            : "selected"
                                                                    }`,
                                                                groupH.includes(
                                                                    `${format(
                                                                        hour,
                                                                        "MM-dd-yyyy"
                                                                    )} ${getHours(
                                                                        hour
                                                                    )}:00`
                                                                ) &&
                                                                    `${
                                                                        timetable.group ==
                                                                        "h"
                                                                            ? "h selected"
                                                                            : "selected"
                                                                    }`,
                                                                [
                                                                    6, 12, 18,
                                                                ].includes(
                                                                    hrIndex
                                                                ) && "space",
                                                                selectedSchedule.length !=
                                                                    0 &&
                                                                    format(
                                                                        hour,
                                                                        "MM-dd-yyyy"
                                                                    ) !=
                                                                        selectedSchedule[0].substr(
                                                                            0,
                                                                            10
                                                                        )
                                                                    ? "sameday"
                                                                    : "diffday"
                                                            )}
                                                        >
                                                            <time
                                                                dateTime={hour}
                                                                className="hr_time"
                                                            >
                                                                {getHours(
                                                                    hour
                                                                ) < 10
                                                                    ? "0" +
                                                                      getHours(
                                                                          hour
                                                                      ) +
                                                                      ":00"
                                                                    : getHours(
                                                                          hour
                                                                      ) + ":00"}
                                                            </time>
                                                        </button>
                                                    );
                                                })}
                                            </div>
                                        ))}
                                    </div>
                                </div>
                            );
                        })()}
                    </Fragment>
                )}
            </div>
        </Fragment>
    );
};

export default Time;
