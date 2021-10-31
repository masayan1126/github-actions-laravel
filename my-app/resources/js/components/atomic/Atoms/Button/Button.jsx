import React, { useCallback, useState, useEffect } from 'react'

const Button = (props) => {
    return (
        <button
            className={props.className}
            onClick={props.onClick}
            data-toggle={props.dataToggle}
            data-target={props.dataTarget}
        >
            {props.buttonName}
        </button>
    )
}

export default Button
