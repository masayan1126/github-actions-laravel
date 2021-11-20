import React, { useCallback, useState, useEffect } from 'react'
import THeaderRow from '../../Molecules/Theader/TheaderRow'
import Theader from '../../Atoms/Table/Theader'
import Image from '../../Atoms/Image/Image'
import BasicForm from '../../Molecules/Form/BasicForm'
import BasicEditForm from '../../Molecules/Form/BasicEditForm'

const StockTable = (props) => {
    return (
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    {props.headerList.map((header) => (
                                        <Theader
                                            scope="col"
                                            className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                            header={header}
                                        />
                                    ))}
                                </tr>
                                {/* <THeaderRow headerList={props.headerList} /> */}
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                {props.dataList.map((data) => (
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <Image
                                                src={data.imageUrl}
                                                alt={`${data.name}の画像`}
                                            />
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {props.isEditMode ? (
                                                <input
                                                    onBlur={(e) => {
                                                        props.toggleMode(e)
                                                    }}
                                                    type="text"
                                                    value={data.name}
                                                    id="hoge"
                                                />
                                            ) : (
                                                // <p
                                                //     onClick={(e) =>
                                                //         props.toggleMode(e)
                                                //     }
                                                // >
                                                //     {data.name}
                                                // </p>
                                                <input
                                                    onClick={(e) => {
                                                        props.toggleMode(e)
                                                    }}
                                                    type="text"
                                                    value={data.name}
                                                    readOnly
                                                />
                                            )}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {data.number}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {data.expiryDate}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <BasicEditForm
                                                action={
                                                    '/stocks/edit/' + data.id
                                                }
                                                method={'GET'}
                                                buttonName={'編集'}
                                            />
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <BasicForm
                                                action={
                                                    '/stocks/delete/' + data.id
                                                }
                                                buttonName={'削除'}
                                                method={'POST'}
                                            ></BasicForm>
                                        </td>
                                    </tr>
                                ))}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    )
}

export default StockTable
