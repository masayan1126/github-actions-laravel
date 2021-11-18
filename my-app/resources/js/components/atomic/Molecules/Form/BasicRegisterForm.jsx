import React, { useCallback, useState, useEffect } from 'react'
import CsrfToken from '../../../shared/variable/CsrfToken'
import TextInput from '../../Atoms/TextInput/TextInput'

const BasicRegisterForm = (props) => {
    return (
        <form action={props.action} method={props.method}>
            <CsrfToken />
            <TextInput
                className="btn btn-primary"
                type="hidden"
                name="data"
                value={JSON.stringify(props.data)}
            />
            <TextInput
                className="btn btn-primary"
                type="submit"
                value={'登録'}
            />
        </form>
    )
}

export default BasicRegisterForm
