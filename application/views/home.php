<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
						<!-- Page Heading -->
						<div class="d-sm-flex align-items-center justify-content-between mb-4">
							<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
						</div>

						<!-- Content Row -->
						<div class="row">
							<!-- Earnings (Monthly) Card Example -->
							<div class="col-xl-3 col-md-6 mb-4">
								<div class="card border-left-primary shadow h-100 py-2">
									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
													Total Assets
												</div>
												<div class="h5 mb-0 font-weight-bold text-gray-800">
													$40,000
												</div>
											</div>
											<div class="col-auto">
												<i class="fas fa-calendar fa-2x text-gray-300"></i>
											</div>
										</div>
									</div>
								</div>
							</div>

							<!-- Earnings (Monthly) Card Example -->
							<div class="col-xl-3 col-md-6 mb-4">
								<div class="card border-left-success shadow h-100 py-2">
									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
													Total Liabilities
												</div>
												<div class="h5 mb-0 font-weight-bold text-gray-800">
													$215,000
												</div>
											</div>
											<div class="col-auto">
												<i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
											</div>
										</div>
									</div>
								</div>
							</div>


							<!-- Earnings (Monthly) Card Example -->
							<div class="col-xl-3 col-md-6 mb-4">
								<div class="card border-left-info shadow h-100 py-2">
									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<div class="text-xs font-weight-bold text-info text-uppercase mb-1">
													Total Revenue
												</div>
												<div class="h5 mb-0 font-weight-bold text-gray-800">
													$215,000
												</div>
											</div>
											<div class="col-auto">
												<i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
											</div>
										</div>
									</div>
								</div>
							</div>

							<!-- Pending Requests Card Example -->
							<div class="col-xl-3 col-md-6 mb-4">
								<div class="card border-left-warning shadow h-100 py-2">
									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
													Total Stockholders' Equity
												</div>
												<div class="h5 mb-0 font-weight-bold text-gray-800">
													18
												</div>
											</div>
											<div class="col-auto">
												<i class="fas fa-comments fa-2x text-gray-300"></i>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- Content Row -->
						<div class="row">
							<!-- Quick Ratio -->
							<div class="col-xl-4 col-lg-3">
								<div class="card bg-success text-white shadow">
									<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
										<h6 class="m-0 font-weight-bold text-primary">Quick Ratio</h6>
									</div>
									<div class="card-body">
										Success
										<div class="text-white-50 small">
											#1cc88a
										</div>
									</div>
								</div>
							</div>

							<!-- Current Ratio -->
							<div class="col-xl-4 col-lg-3">
								<div class="card bg-success text-white shadow">
									<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
										<h6 class="m-0 font-weight-bold text-primary">Current Ratio</h6>
									</div>
									<div class="card-body">
										Success
										<div class="text-white-50 small">
											#1cc88a
										</div>
									</div>
								</div>
							</div>

							<!-- Pie Chart -->
							<div class="col-xl-4 col-lg-6">
								<div class="card shadow mb-4">
									<!-- Card Header - Dropdown -->
									<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
										<h6 class="m-0 font-weight-bold text-primary">Total Entries</h6>
									</div>
									<!-- Card Body -->
									<div class="card-body">
										<div class="chart-pie pt-4 pb-2">
											<canvas id="myPieChart"></canvas>
										</div>
										<div class="mt-4 text-center small">
											<span class="mr-2">
												<i class="fas fa-circle text-success"></i> Approved
											</span>
											<span class="mr-2">
												<i class="fas fa-circle text-warning"></i> Pending
											</span>
											<span class="mr-2">
												<i class="fas fa-circle text-danger"></i> Rejected
											</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
