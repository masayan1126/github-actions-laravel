import React, { useCallback, useState, useEffect } from 'react'

const TextInput = (props) => {
    return <input type={props.type} name={props.name} value={props.value} />
}

export default TextInput
