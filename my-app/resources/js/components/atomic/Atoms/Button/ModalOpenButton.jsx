import React, { useCallback, useState, useEffect } from 'react'

const ModalOpenButton = (props) => {
    return (
        <button
            className={props.className}
            data-toggle={props.dataToggle}
            data-target={props.dataTarget}
        >
            {props.buttonName}
        </button>
    )
}

export default ModalOpenButton
