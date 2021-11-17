import React, { useCallback, useState, useEffect } from 'react'

/**
 * setStateを受け取り、useCallbackにして返します
 *
 * @param {*} elementId
 * @returns
 */
const InputFunction = (setStateFunc) => {
    return useCallback(
        (event) => {
            setStateFunc(event.target.value)
        },
        [setStateFunc]
    )
}

export default InputFunction
