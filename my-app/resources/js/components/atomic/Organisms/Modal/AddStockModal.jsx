import React, { useCallback, useState, useEffect } from 'react'
import BarcodeReader from '../BarcodeReader'
import Button from '../../Atoms/Button/Button'
import ListWithImage from '../../Molecules/List/ListWithImage'
import BasicRegisterForm from '../../Molecules/Form/BasicRegisterForm'
import ModalCloseButton from '../../Atoms/Button/ModalCloseButton'

const AddStockModal = (props) => {
    return (
        <div
            class="modal fade"
            id="addStockModal"
            role="dialog"
            aria-labelledby="addStockModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addStockModalLabel">
                            商品検索
                        </h5>
                        <ModalCloseButton
                            type="button"
                            className="close"
                            dataDismiss="modal"
                            ariaLabel="Close"
                        />
                    </div>
                    <div class="modal-body">
                        <BarcodeReader
                            barcode={props.barcode}
                            inputBarCode={props.inputBarCode}
                            setBarCode={props.setBarCode}
                            fetchRakutenProducts={() =>
                                props.fetchRakutenProducts()
                            }
                        />
                        <ListWithImage list={props.list} />
                    </div>
                    <div class="modal-footer">
                        <BasicRegisterForm
                            action={'/stocks/store'}
                            method={'POST'}
                            data={props.list}
                        ></BasicRegisterForm>
                    </div>
                </div>
            </div>
        </div>
    )
}

export default AddStockModal
