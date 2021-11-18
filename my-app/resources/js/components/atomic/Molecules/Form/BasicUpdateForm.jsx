import React, { useCallback, useState, useEffect } from 'react'
import CsrfToken from '../../../shared/variable/CsrfToken'

const BasicUpdateForm = (props) => {
    return (
        <form action={props.action} method={props.method}>
            <CsrfToken />
            <input type="submit" value={props.buttonName} />
        </form>
    )
}

export default BasicUpdateForm
