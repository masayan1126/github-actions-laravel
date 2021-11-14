import React, { useCallback, useState, useEffect } from 'react'

const BasicRegisterForm = (props) => {
    let csrf_token = document.head.querySelector(
        'meta[name="csrf-token"]'
    ).content

    return (
        <form action={props.action} method={props.method}>
            <input type="hidden" name="_token" value={csrf_token} />
            <input
                className="btn btn-primary"
                type="hidden"
                name="data"
                value={JSON.stringify(props.data)}
            />
            <input type="submit" value={props.buttonName} />
        </form>
    )
}

export default BasicRegisterForm
