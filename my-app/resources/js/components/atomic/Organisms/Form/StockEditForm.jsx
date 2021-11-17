import React, { useCallback, useState, useEffect } from 'react'
import TextInput from '../../Atoms/TextInput/TextInput'
import Button from '../../Atoms/Button/Button'
import Image from '../../Atoms/Image/Image'
import BasicUpdateForm from '../../Molecules/Form/BasicUpdateForm'

const StockEditForm = (props) => {
    let csrf_token = document.head.querySelector(
        'meta[name="csrf-token"]'
    ).content
    return (
        <form action={'/stocks/update/' + props.productId} method="POST">
            <input type="hidden" name="_token" value={csrf_token} />
            <Image src={props.productImageUrl} alt={props.name} />
            <input
                type="hidden"
                name={'productImageUrl'}
                value={props.productImageUrl}
            />
            <input type="hidden" name={'productUrl'} value={props.productUrl} />
            <div class="form-group">
                <label for="inputStockName">商品名</label>
                <TextInput
                    id={'inputStockName'}
                    className={'form-control'}
                    type={'text'}
                    name={'productName'}
                    value={props.productName}
                    onChange={props.inputProductName}
                />
            </div>
            <div class="form-group">
                <label for="inputStockNumber">在庫数</label>
                <TextInput
                    id={'inputStockNumber'}
                    className={'form-control'}
                    type={'number'}
                    name={'number'}
                    value={props.number}
                    onChange={props.inputNumber}
                />
            </div>
            <div class="form-group">
                <label for="inputExpierDate">賞味期限</label>
                <TextInput
                    id={'inputExpierDate'}
                    className={'form-control'}
                    type={'date'}
                    name={'expiryDate'}
                    value={props.expiryDate}
                    onChange={props.inputExpiryDate}
                />
            </div>
            <TextInput
                type={'submit'}
                value={'確定'}
                className={'btn btn-primary'}
                id={'submit-button_stock-edit'}
            />
        </form>
    )
}

export default StockEditForm
