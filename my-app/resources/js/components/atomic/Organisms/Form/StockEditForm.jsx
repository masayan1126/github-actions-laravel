import CsrfToken from '../../../shared/variable/CsrfToken'
import Image from '../../Atoms/Image/Image'
import React, { useCallback, useState, useEffect } from 'react'
import TextInput from '../../Atoms/TextInput/TextInput'

const StockEditForm = (props) => {
    return (
        <form action={'/stocks/update/' + props.productId} method="POST">
            <CsrfToken />
            <Image src={props.productImageUrl} alt={props.name} />
            <TextInput
                type="hidden"
                name={'productImageUrl'}
                value={props.productImageUrl}
            />
            <TextInput
                type="hidden"
                name={'productUrl'}
                value={props.productUrl}
            />
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
