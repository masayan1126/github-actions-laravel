import React, { useCallback, useState, useEffect } from 'react'
import Form from '../../Atoms/Form/Form'
import TextInput from '../../Atoms/TextInput/TextInput'
import BarcodeReader from '../BarcodeReader'

const RakutenSearchForm = (props) => {
    return (
        <form action="/products/search" method={'GET'}>
            <TextInput
                type={'text'}
                name={'barcode'}
                value={props.barcode}
                onChange={props.inputBarCode}
                required={true}
                className=""
                id={'barcode'}
            />
            <TextInput
                type={'submit'}
                name={''}
                value={'追加する'}
                className="btn btn-secondary"
            />
        </form>
    )
}

export default RakutenSearchForm
