import React, { useCallback, useState, useEffect } from 'react'
import Form from '../../Atoms/Form/Form'
import TextInput from '../../Atoms/TextInput/TextInput'

const PrimaryForm = (props) => {
    return (
        <Form action={props.action} method={props.method}>
            <TextInput
                type={props.type}
                name={props.name}
                value={props.value}
            />
            <TextInput
                type={props.type}
                name={props.name}
                value={props.value}
            />
        </Form>
    )
}

export default PrimaryForm
