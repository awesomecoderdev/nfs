import { XMarkIcon } from "@heroicons/react/24/solid";
import React from "react";
import Draggable from "react-draggable";

const Popup = ({ children, title, onClose }) => {
    const [position, setPosition] = React.useState({ x: fleft, y: ftop });
    const handleDrag = (e, { x, y }) => {
        setPosition({ x, y });
    };
    return (
        <div className="thePopUpContainer">
            <Draggable handle=".handle" position={position} onDrag={handleDrag}>
                <div className="popup">
                    <div className="handle">{title}</div>
                    <div className="content">{children}</div>
                    <button className="close-button" onClick={onClose}>
                        <XMarkIcon className="cicon" />
                    </button>
                </div>
            </Draggable>
        </div>
    );
};

export default Popup;
