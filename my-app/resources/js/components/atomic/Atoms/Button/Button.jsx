import React, { useCallback, useState, useEffect } from 'react'

const Button = (props) => {
    return (
        <button className={props.className} onClick={props.onClick}>
            {props.buttonName}
        </button>
    )
}

export default Button
