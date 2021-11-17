import React, { useCallback, useState, useEffect } from 'react'

const BasicEditForm = (props) => {
    return (
        <form action={props.action} method={props.method}>
            <input type="submit" value={props.buttonName} />
        </form>
    )
}

export default BasicEditForm
