<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
						<!-- Page Heading -->
						<div class="d-sm-flex align-items-center justify-content-between mb-4">
							<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
						</div>

						<!-- Content Row -->
						<div class="row">
							<!-- Total Assets Card -->
							<div class="col-xl-3 col-md-6 mb-4">
								<div class="card border-left-primary shadow h-100 py-2">
									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
													Total Assets
												</div>
												<div class="h5 mb-0 font-weight-bold text-gray-800">
													$<?=number_format($assetsTotal, 2);?>
												</div>
											</div>
											<div class="col-auto">
												<i class="fas fa-calendar fa-2x text-gray-300"></i>
											</div>
										</div>
									</div>
								</div>
							</div>

							<!-- Total Liabilities Card -->
							<div class="col-xl-3 col-md-6 mb-4">
								<div class="card border-left-success shadow h-100 py-2">
									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
													Total Liabilities
												</div>
												<div class="h5 mb-0 font-weight-bold text-gray-800">
												$<?=number_format($liabilitiesTotal, 2);?>
												</div>
											</div>
											<div class="col-auto">
												<i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
											</div>
										</div>
									</div>
								</div>
							</div>

							<!-- Total Entries Card -->
							<div class="col-xl-3 col-md-6 mb-4">
								<div class="card border-left-warning shadow h-100 py-2">
									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
													Total Entries
												</div>
												<div class="h5 mb-0 font-weight-bold text-gray-800">
												<?=$entriesTotal;?> Total Entries
												</div>
											</div>
											<div class="col-auto">
												<i class="fas fa-book fa-2x text-gray-300"></i>
											</div>
										</div>
									</div>
								</div>
							</div>

							<!-- Total Pending Entries Card -->
							<div class="col-xl-3 col-md-6 mb-4">
								<div class="card border-left-danger shadow h-100 py-2">
									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
													Pending Entries
												</div>
												<div class="h5 mb-0 font-weight-bold text-gray-800">
												<?=$entriesPendingTotal;?> Total Pending Entries
												</div>
											</div>
											<div class="col-auto">
												<i class="fas fa-edit fa-2x text-gray-300"></i>
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
									<div class="card-body text-center">
										<h2><?=number_format($quickRatio, 2);?></h2>
									</div>
								</div>
							</div>

							<!-- Current Ratio -->
							<div class="col-xl-4 col-lg-3">
								<div class="card bg-success text-white shadow">
									<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
										<h6 class="m-0 font-weight-bold text-primary">Current Ratio</h6>
									</div>
									<div class="card-body text-center">
										<h2><?=number_format($currentRatio, 2);?></h2>
									</div>
								</div>
							</div>

							<!-- Debt Ratio -->
							<div class="col-xl-4 col-lg-3">
								<div class="card bg-success text-white shadow">
									<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
										<h6 class="m-0 font-weight-bold text-primary">Debt Ratio</h6>
									</div>
									<div class="card-body text-center">
										<h2><?=number_format($debtRatio, 2);?></h2>
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
