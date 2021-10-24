import React, { useCallback, useState, useEffect } from 'react'

const Form = (props) => {
    let csrf_token = document.head.querySelector(
        'meta[name="csrf-token"]'
    ).content

    return (
        <form action={props.action} method={props.method}>
            <input type="hidden" name="_token" value={csrf_token} />
        </form>
    )
}

export default Form
