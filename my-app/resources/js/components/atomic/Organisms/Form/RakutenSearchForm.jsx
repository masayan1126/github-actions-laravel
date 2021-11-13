import React, { useCallback, useState, useEffect } from 'react'
import Form from '../../Atoms/Form/Form'
import TextInput from '../../Atoms/TextInput/TextInput'
import BarcodeReader from '../BarcodeReader'
import Button from '../../Atoms/Button/Button'

const RakutenSearchForm = (props) => {
    useEffect(() => {
        // setStocks(stockList)
        console.log(`barcode:${props.barcode}`)
    }, [props.barcode])

    return (
        // <form action="/products/search" method={'GET'}>

        // </form>
        <>
            <TextInput
                type={'text'}
                name={'barcode'}
                value={props.barcode}
                onChange={props.inputBarCode}
                required={true}
                className=""
                id={'barcode'}
            />
            <Button
                className="btn btn-secondary"
                onClick={() => props.fetchRakutenProducts(props.barcode)}
                buttonName={'検索する'}
            />
        </>
    )
}

export default RakutenSearchForm
