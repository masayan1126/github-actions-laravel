import React, { useCallback, useState, useEffect } from 'react'
import ReactDOM from 'react-dom'
import InputFunction from '../../../shared/function/InputFunction'
import StockEditForm from '../../Organisms/Form/StockEditForm'

const EditStock = () => {
    const element = document.getElementById('stock-edit')
    const [productImageUrl, setProductImageUrl] = useState('')
    const [productId, setProductId] = useState('')
    const [productName, setProductName] = useState('')
    const [productUrl, setProductUrl] = useState('')
    const [expiryDate, setExpiryDate] = useState('')
    const [number, setNumber] = useState(0)

    useEffect(() => {
        if (element !== null && element.dataset.stock_edit !== '') {
            const st = JSON.parse(element.dataset.stock_edit)
            setProductImageUrl(st.imageUrl)
            setProductId(st.id)
            setProductName(st.name)
            setProductUrl(st.url)
            setExpiryDate(st.expiryDate)
            setNumber(st.number)
        }
    }, [])

    const inputProductImageUrl = InputFunction(setProductImageUrl)
    const inputProductId = InputFunction(setProductId)
    const inputProductName = InputFunction(setProductName)
    const inputProductUrl = InputFunction(setProductUrl)
    const inputExpiryDate = InputFunction(setExpiryDate)
    const inputNumber = InputFunction(setNumber)

    return (
        <div className="container">
            <h4>在庫編集</h4>
            <StockEditForm
                {...{
                    productId,
                    productName,
                    productImageUrl,
                    productUrl,
                    expiryDate,
                    number,
                    inputProductId,
                    inputProductName,
                    inputProductImageUrl,
                    inputProductUrl,
                    inputExpiryDate,
                    inputNumber
                }}
            />
        </div>
    )
}

export default EditStock
if (document.getElementById('stock-edit')) {
    ReactDOM.render(<EditStock />, document.getElementById('stock-edit'))
}
