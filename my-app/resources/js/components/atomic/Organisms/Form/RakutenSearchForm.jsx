import React, { useCallback, useState, useEffect } from 'react'
import TextInput from '../../Atoms/TextInput/TextInput'
import Button from '../../Atoms/Button/Button'

const RakutenSearchForm = (props) => {
    return (
        <>
            <div class="input-group mb-3">
                <TextInput
                    type={'text'}
                    name={'barcode'}
                    value={props.barcode}
                    onChange={props.inputBarCode}
                    required={true}
                    className="form-control"
                    id={'barcode'}
                />
            </div>
            <Button
                className="btn btn-secondary"
                onClick={() => props.fetchRakutenProducts(props.barcode)}
                buttonName={'検索する'}
            />
        </>
    )
}

export default RakutenSearchForm
