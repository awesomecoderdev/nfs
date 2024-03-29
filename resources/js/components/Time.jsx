import React, { Component, Fragment, useState, useEffect } from "react";
import { Menu, Transition, Tab, Popover } from "@headlessui/react";
import {
    ChevronLeftIcon,
    ChevronRightIcon,
    TrashIcon,
} from "@heroicons/react/24/solid";
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
    const [wid, setWid] = useState(currentWid ?? 439);
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
    const [alreadyBooked, setAlreadyBooked] = useState(bookings ?? []);
    const [alreadyStaticBooked, setAlreadyStaticBooked] = useState(
        staticBookings ?? []
    );
    const [mousePosition, setMousePosition] = useState({ x: 0, y: 0, r: 0 });
    const [popover, setPopover] = useState(false);
    const [popoverUser, setPopoverUser] = useState({
        id: null,
        name: null,
    });
    const [theClickedUser, setTheClickedUser] = useState({});
    const [popoverData, setPopoverData] = useState([]);
    const handleMouseMove = (event) => {
        const element = event.target;
        const { top, left, right } = element.getBoundingClientRect();
        // console.log(`Element position: ${top}px from top, ${left}px from left`);
        // console.log(
        //     `Element position: ${event.clientX}px from top, ${event.clientY}px from left`
        // );
        // setMousePosition({ x: left, y: top });
        // setMousePosition({ x: event.clientX, y: event.clientY });

        setMousePosition({
            x: event.clientX,
            y: top,
            r: window.innerWidth - (left + event.clientX),
        });
        // setMousePosition({ x: event.clientX, y: top });
    };

    // console.log("mousePosition", mousePosition);

    const [showPopup, setShowPopup] = useState(true);

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
        // console.log("selectedSchedule", selectedSchedule);
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

    const [bookingStatus, setBookingStatus] = useState(null);
    const [bookingStatusMsg, setBookingStatusMsg] = useState(
        "Etwas ist schief gelaufen, bitte versuchen Sie es nach einiger Zeit erneut."
    );

    const handleSubmitAddBookingFrom = (e) => {
        e.preventDefault();
        let formData = new FormData(e.target);
        let data = {};
        formData.forEach(function (value, key) {
            data[key] = value;
        });

        axios({
            method: "post",
            url: bookdienstplan,
            data: data,
            headers: { "Content-Type": "multipart/form-data" },
        })
            .then(function (data) {
                const response = data.data;
                console.log("response", response);
                if (response.success) {
                    setBookingStatus(true);
                    setBookingStatusMsg(response.message);
                    setAlreadyBooked(response.bookedArr ?? []);
                    setAlreadyStaticBooked(response.bookedStaticArr ?? []);
                } else {
                    setBookingStatus(false);
                    setBookingStatusMsg(response.message);
                }
            })
            .catch(function (response) {
                setBookingStatus(false);
                setBookingStatusMsg(
                    "Etwas ist schief gelaufen, bitte versuchen Sie es nach einiger Zeit erneut."
                );
            });
    };

    const handleClose = () => {
        setShowPopup(true);
        setFirstSelect(null);
        setEndSelect(null);
        setBookingStatus(null);
        setGroupA([]);
        setGroupB([]);
        setGroupD([]);
        setGroupH([]);
        setSelectedTheGroup("");
    };

    return (
        <Fragment>
            <div className="timeheadings">
                <div className="timeheading centercontents">
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
                                                                                        wid
                                                                                            ? "&wid=" +
                                                                                              wid
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
            </div>

            {((popover && isAdmin) ||
                (popover && popoverData.user == currentUser.id)) && (
                <div className="thepopoveroverlay">
                    <div
                        className="thepopover"
                        style={{
                            top: mousePosition.y,
                            left:
                                mousePosition.r < 0
                                    ? mousePosition.x - 230
                                    : mousePosition.x + 30,
                        }}
                    >
                        <button
                            className="closethepopup"
                            onClick={(e) => {
                                setPopover(false);
                            }}
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24"
                                fill="currentColor"
                                aria-hidden="true"
                                className="cicon"
                            >
                                <path
                                    fillRule="evenodd"
                                    d="M5.47 5.47a.75.75 0 011.06 0L12 10.94l5.47-5.47a.75.75 0 111.06 1.06L13.06 12l5.47 5.47a.75.75 0 11-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 01-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 010-1.06z"
                                    clipRule="evenodd"
                                ></path>
                            </svg>
                        </button>
                        <p>
                            {theClickedUser.name &&
                                theClickedUser.name.substr(0, 25) +
                                    `${
                                        theClickedUser.name.length > 25 && "..."
                                    }`}
                        </p>
                        <p>
                            <b>Start : </b>
                            {popoverData.start
                                ? popoverData.start
                                      .substr(-5)
                                      .replace("24:00", "00:00")
                                : "Loading"}
                        </p>
                        <p>
                            <b>End : </b>
                            {popoverData.end
                                ? popoverData.end
                                      .substr(-5)
                                      .replace("24:00", "00:00")
                                : "Loading"}
                        </p>
                        <p>
                            <b>Group : </b>
                            {popoverData.col
                                ? popoverData.col.toUpperCase()
                                : "Loading"}
                        </p>
                        <form action={deleteBookdienstplan} method="post">
                            <input type="hidden" name="wid" value={wid} />

                            <input
                                type="hidden"
                                name="start"
                                value={request?.start}
                            />
                            <input
                                type="hidden"
                                name="id"
                                value={popoverData.id}
                            />
                            <input type="hidden" name="_token" value={token} />
                            <input
                                type="hidden"
                                name="_method"
                                value="DELETE"
                            />
                            <button type="submit">
                                <TrashIcon className="trashicon" />
                            </button>
                        </form>
                    </div>
                </div>
            )}

            {!showPopup && (
                <Popup title="Bereitschaftszeit anlegen" onClose={handleClose}>
                    <div className="thepopcontainer">
                        {bookingStatus == null && (
                            <form
                                className="timetableform"
                                // action={bookdienstplan}
                                onSubmit={(e) => handleSubmitAddBookingFrom(e)}
                                method="POST"
                            >
                                <input
                                    type="hidden"
                                    name="start"
                                    value={request.start ?? ""}
                                />
                                <input type="hidden" name="wid" value={wid} />

                                <div>
                                    <b>Tag:</b>{" "}
                                    {format(firstSelect, "eee dd.MM", {
                                        locale: de,
                                    })}
                                </div>
                                <div>
                                    <b>Start: </b>
                                    {selectedSchedule[0]
                                        .substr(-5)
                                        .replace("24:00", "00:00")}{" "}
                                    Uhr
                                    {/* {parseInt(selectedSchedule[0].substr(-5, 2)) >
                                    12
                                        ? " PM"
                                        : " Bin"} */}
                                </div>
                                <div>
                                    <b>End: </b>
                                    {selectedSchedule[
                                        selectedSchedule.length - 1
                                    ]
                                        .substr(-5)
                                        .replace("24:00", "00:00")}{" "}
                                    Uhr
                                </div>
                                <div>
                                    <b>Dauer: </b>
                                    {selectedSchedule.length - 1 + " Stunden"}
                                </div>
                                {selectedSchedule?.map((item, index) => (
                                    <input
                                        key={item.toString()}
                                        type="hidden"
                                        name={`hours[${index}]`}
                                        value={item}
                                    />
                                ))}
                                <input
                                    type="hidden"
                                    name="col"
                                    value={selectedTheGroup}
                                />
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
                                    <button type="submit">Ja</button>
                                    <button
                                        type="submit"
                                        onClick={(e) => setShowPopup(true)}
                                    >
                                        Nein
                                    </button>
                                </div>
                            </form>
                        )}

                        {bookingStatus == true ? (
                            <div className="timetableform alrtcontainer">
                                <div>
                                    <div className="iconbox">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            strokeWidth="1.5"
                                            stroke="currentColor"
                                            className="success"
                                        >
                                            <path
                                                strokeLinecap="round"
                                                strokeLinejoin="round"
                                                d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                            />
                                        </svg>
                                    </div>
                                    <div>
                                        <span>{bookingStatusMsg}</span>
                                    </div>
                                </div>
                            </div>
                        ) : (
                            <div className="timetableform alrtcontainer">
                                <div>
                                    <div className="iconbox">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            strokeWidth="1.5"
                                            stroke="currentColor"
                                            className="error"
                                        >
                                            <path
                                                strokeLinecap="round"
                                                strokeLinejoin="round"
                                                d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"
                                            />
                                        </svg>
                                    </div>
                                    <div>
                                        <span>{bookingStatusMsg}</span>
                                    </div>
                                </div>
                            </div>
                        )}
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
                                                    const inAlreadyBooking =
                                                        alreadyBooked[
                                                            `${
                                                                timetable.group
                                                            } ${format(
                                                                hour,
                                                                "MM-d-yyyy kk:mm"
                                                            )}`
                                                        ];
                                                    const inAlreadyStaticBooked =
                                                        alreadyStaticBooked[
                                                            `${format(
                                                                hour,
                                                                "MM-d-yyyy kk:mm"
                                                            )}`
                                                        ];

                                                    // console.log("inAlreadyBooking",inAlreadyBooking);

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
                                                                    "MM-dd-yyyy kk:mm"
                                                                )}`;

                                                                if (
                                                                    !inAlreadyBooking
                                                                ) {
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
                                                                                    start:
                                                                                        firstSelect <
                                                                                        hour
                                                                                            ? firstSelect
                                                                                            : hour,
                                                                                    end:
                                                                                        firstSelect >
                                                                                        hour
                                                                                            ? firstSelect
                                                                                            : hour,
                                                                                }
                                                                            );

                                                                        const itsInBooking =
                                                                            selectedHours.filter(
                                                                                (
                                                                                    item
                                                                                ) => {
                                                                                    const inAlreadyBooking =
                                                                                        alreadyBooked[
                                                                                            `${
                                                                                                timetable.group
                                                                                            } ${format(
                                                                                                item,
                                                                                                "MM-d-yyyy kk:mm"
                                                                                            )}`
                                                                                        ];

                                                                                    return inAlreadyBooking
                                                                                        ? true
                                                                                        : false;
                                                                                }
                                                                            );

                                                                        if (
                                                                            itsInBooking.length !=
                                                                            0
                                                                        ) {
                                                                            setBookingStatus(
                                                                                false
                                                                            );
                                                                            setBookingStatusMsg(
                                                                                "Sie können nicht auswählen, was bereits gebucht ist."
                                                                            );
                                                                        }

                                                                        const selectedArr =
                                                                            selectedHours?.map(
                                                                                (
                                                                                    item
                                                                                ) =>
                                                                                    `${format(
                                                                                        item,
                                                                                        "MM-dd-yyyy kk:mm"
                                                                                    )}`
                                                                            );

                                                                        setSelectedSchedule(
                                                                            selectedArr
                                                                        );

                                                                        // console.log(
                                                                        //     "selectedArr",
                                                                        //     selectedArr
                                                                        // );

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
                                                                } else {
                                                                    const theScheduledUser =
                                                                        users[
                                                                            `${inAlreadyBooking?.user}`
                                                                        ] ??
                                                                        false;
                                                                }
                                                                const theScheduledUser =
                                                                    users[
                                                                        `${inAlreadyBooking?.user}`
                                                                    ] ?? false;

                                                                setTheClickedUser(
                                                                    inAlreadyBooking
                                                                );
                                                                setPopoverData(
                                                                    inAlreadyBooking
                                                                );
                                                                setPopoverUser({
                                                                    id: inAlreadyBooking?.user,
                                                                    name:
                                                                        theScheduledUser.name ??
                                                                        theScheduledUser,
                                                                });

                                                                if (
                                                                    inAlreadyBooking
                                                                ) {
                                                                    handleMouseMove(
                                                                        e
                                                                    );

                                                                    if (
                                                                        theScheduledUser
                                                                    ) {
                                                                        setPopoverUser(
                                                                            {
                                                                                id: inAlreadyBooking?.user,
                                                                                name:
                                                                                    theScheduledUser.name ??
                                                                                    theScheduledUser,
                                                                            }
                                                                        );
                                                                    }

                                                                    setPopover(
                                                                        true
                                                                    );
                                                                }
                                                            }}
                                                            className={classNames(
                                                                `hour`,
                                                                groupA.includes(
                                                                    `${format(
                                                                        hour,
                                                                        "MM-dd-yyyy kk:mm"
                                                                    )}`
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
                                                                        "MM-dd-yyyy kk:mm"
                                                                    )}`
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
                                                                        "MM-dd-yyyy kk:mm"
                                                                    )}`
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
                                                                        "MM-dd-yyyy kk:mm"
                                                                    )}`
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
                                                                    "diffgroup",
                                                                inAlreadyBooking &&
                                                                    `${inAlreadyBooking.col} selected`,
                                                                !isAdmin &&
                                                                    popoverData.user ==
                                                                        currentUser.id &&
                                                                    inAlreadyStaticBooked &&
                                                                    `diffgroup`
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
                                                    const inAlreadyBooking =
                                                        alreadyBooked[
                                                            `${
                                                                timetable.group
                                                            } ${format(
                                                                hour,
                                                                "MM-d-yyyy kk:mm"
                                                            )}`
                                                        ];

                                                    const inAlreadyStaticBooked =
                                                        alreadyStaticBooked[
                                                            `${format(
                                                                hour,
                                                                "MM-d-yyyy kk:mm"
                                                            )}`
                                                        ];

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
                                                                    "MM-dd-yyyy kk:mm"
                                                                )}`;

                                                                if (
                                                                    !inAlreadyBooking
                                                                ) {
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
                                                                                    start:
                                                                                        firstSelect <
                                                                                        hour
                                                                                            ? firstSelect
                                                                                            : hour,
                                                                                    end:
                                                                                        firstSelect >
                                                                                        hour
                                                                                            ? firstSelect
                                                                                            : hour,
                                                                                }
                                                                            );

                                                                        const itsInBooking =
                                                                            selectedHours.filter(
                                                                                (
                                                                                    item
                                                                                ) => {
                                                                                    const inAlreadyBooking =
                                                                                        alreadyBooked[
                                                                                            `${
                                                                                                timetable.group
                                                                                            } ${format(
                                                                                                item,
                                                                                                "MM-d-yyyy kk:mm"
                                                                                            )}`
                                                                                        ];

                                                                                    return inAlreadyBooking
                                                                                        ? true
                                                                                        : false;
                                                                                }
                                                                            );

                                                                        if (
                                                                            itsInBooking.length !=
                                                                            0
                                                                        ) {
                                                                            setBookingStatus(
                                                                                false
                                                                            );
                                                                            setBookingStatusMsg(
                                                                                "Sie können nicht auswählen, was bereits gebucht ist."
                                                                            );
                                                                        }

                                                                        const selectedArr =
                                                                            selectedHours?.map(
                                                                                (
                                                                                    item
                                                                                ) =>
                                                                                    `${format(
                                                                                        item,
                                                                                        "MM-dd-yyyy kk:mm"
                                                                                    )}`
                                                                            );

                                                                        setSelectedSchedule(
                                                                            selectedArr
                                                                        );

                                                                        // console.log(
                                                                        //     "selectedArr",
                                                                        //     selectedArr
                                                                        // );

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
                                                                } else {
                                                                    const theScheduledUser =
                                                                        users[
                                                                            `${inAlreadyBooking?.user}`
                                                                        ] ??
                                                                        false;
                                                                }
                                                                const theScheduledUser =
                                                                    users[
                                                                        `${inAlreadyBooking?.user}`
                                                                    ] ?? false;

                                                                setTheClickedUser(
                                                                    inAlreadyBooking
                                                                );
                                                                setPopoverData(
                                                                    inAlreadyBooking
                                                                );
                                                                setPopoverUser({
                                                                    id: inAlreadyBooking?.user,
                                                                    name:
                                                                        theScheduledUser.name ??
                                                                        theScheduledUser,
                                                                });

                                                                if (
                                                                    inAlreadyBooking
                                                                ) {
                                                                    handleMouseMove(
                                                                        e
                                                                    );

                                                                    if (
                                                                        theScheduledUser
                                                                    ) {
                                                                        setPopoverUser(
                                                                            {
                                                                                id: inAlreadyBooking?.user,
                                                                                name:
                                                                                    theScheduledUser.name ??
                                                                                    theScheduledUser,
                                                                            }
                                                                        );
                                                                    }

                                                                    setPopover(
                                                                        true
                                                                    );
                                                                }
                                                            }}
                                                            className={classNames(
                                                                `hour`,
                                                                groupA.includes(
                                                                    `${format(
                                                                        hour,
                                                                        "MM-dd-yyyy kk:mm"
                                                                    )}`
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
                                                                        "MM-dd-yyyy kk:mm"
                                                                    )}`
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
                                                                        "MM-dd-yyyy kk:mm"
                                                                    )}`
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
                                                                        "MM-dd-yyyy kk:mm"
                                                                    )}`
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
                                                                firstSelect &&
                                                                    format(
                                                                        firstSelect,
                                                                        "MM-dd-yyyy"
                                                                    ) ==
                                                                        format(
                                                                            hour,
                                                                            "MM-dd-yyyy"
                                                                        ) &&
                                                                    "sameday",
                                                                firstSelect &&
                                                                    format(
                                                                        firstSelect,
                                                                        "MM-dd-yyyy"
                                                                    ) !=
                                                                        format(
                                                                            hour,
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
                                                                    "diffgroup",
                                                                inAlreadyBooking &&
                                                                    `${inAlreadyBooking.col} selected`,
                                                                !isAdmin &&
                                                                    popoverData.user ==
                                                                        currentUser.id &&
                                                                    inAlreadyStaticBooked &&
                                                                    `diffgroup`
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
