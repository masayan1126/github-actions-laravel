import React, { useCallback, useState, useEffect } from 'react'

const TextInput = (props) => {
    return (
        <input
            type={props.type}
            name={props.name}
            value={props.value}
            className={props.className}
            onChange={props.onChange}
            required={props.required}
            id={props.id}
            onClick={props.onClick}
        />
    )
}

export default TextInput
