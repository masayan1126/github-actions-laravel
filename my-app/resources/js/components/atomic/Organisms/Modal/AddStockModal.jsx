import React, { useCallback, useState, useEffect } from 'react'
import BarcodeReader from '../BarcodeReader'
import Button from '../../Atoms/Button/Button'

const AddStockModal = (props) => {
    return (
        <div
            class="modal fade"
            id="exampleModal"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Modal title
                        </h5>
                        <button
                            type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close"
                        >
                            <span aria-hidden="true">&times;</span>
                        </button>
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
                    </div>
                    <div class="modal-footer">
                        <button
                            className="btn btn-secondary"
                            onClick={() => props.fetchRakutenProducts()}
                        >
                            検索
                        </button>
                        <button
                            type="button"
                            class="btn btn-primary"
                            data-dismiss="modal"
                        >
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    )
}

export default AddStockModal
