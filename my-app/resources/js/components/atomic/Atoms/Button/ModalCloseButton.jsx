import React, { useCallback, useState, useEffect } from 'react'

const ModalCloseButton = (props) => {
    return (
        <button
            className={props.className}
            data-toggle={props.dataToggle}
            data-target={props.dataTarget}
            data-dismiss={props.dataDismiss}
            aria-label={props.ariaLabel}
        >
            {props.buttonName}
            <span aria-hidden="true">&times;</span>
        </button>
    )
}

export default ModalCloseButton
